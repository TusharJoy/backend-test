<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Models\FieldResource;
use App\Models\Subscriber;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class SubscriberController extends Controller
{

    public function index()
    {
        try {

            return response()
                ->json(
                    [
                        'data' => Subscriber::paginate(10),
                        "message"   => "Resource created"
                    ],
                    200
                );
        } catch (Exception $exception) {
            Log::emergency($exception->getMessage());
            return response()
                ->json(['message' => "couldn't process the data"], 422);
        }
    }

    public function store(SubscriberRequest $subscriberRequest)
    {
        try {
            $validated = $subscriberRequest->validated();

            $subscriber = Subscriber::create(
                array_merge(
                    $validated,
                    [
                        'state' => Subscriber::STATUS_ACTIVE
                    ]
                )
            );
            FieldResource::insert([
                'title' => FieldResource::TYPE_SUBSCRIBED_AT['title'],
                FieldResource::TYPE_SUBSCRIBED_AT['type'] => Carbon::now(),
                'subscriber_id' => $subscriber->id
            ]);

            return response()
                ->json(
                    [
                        'data' => $subscriber,
                        "message"   => "Resource created"
                    ],
                    200
                );
        } catch (Exception $exception) {
            return response()
                ->json(['message' => "couldn't process the data"], 422);
        }
    }

    public function details(Subscriber $subscriber)
    {
        try {
            $subscriber->load('fields');
            return response()
                ->json(
                    [
                        'data' => $subscriber,
                        "message" => "Resource details retrieved"
                    ],
                    200
                );
        } catch (Exception $exception) {
            return response()
                ->json(['message' => "couldn't process the data"], 422);
        }
    }

    public function destroy(Subscriber $subscriber)
    {
        try {
            $subscriber->delete();
            return response()
                ->json(
                    ['message' => "Resource Deleted"],
                    200
                );
        } catch (Exception $exception) {
            return response()
                ->json(['message' => "couldn't process the data"], 422);
        }
    }
}
