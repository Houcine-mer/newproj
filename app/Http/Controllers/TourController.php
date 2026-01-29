<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Tour;
use App\Models\User;
class TourController extends Controller
{
    function loadAllTourOrders() {
        $id = request()->route('id');
        $user = User::find($id);
        if(!$user) return response()->json([
            'message' => "user does not exist",
        ]);
        $userTourOrders = $user->TouredCars()
        ->withPivot(['start_date', 'number_of_hours', 'total_price'])
        ->get();
        return response()->json($userTourOrders);
    }
public function CreateOrder(Request $request)
{
    $user_id = $request->route('id');
    $car_id = $request->route('carID');

    $user = User::find($user_id);
    $car = Car::find($car_id);

    if (!$user) {
        return response()->json(['message' => 'User does not exist'], 404);
    }

    if (!$car) {
        return response()->json(['message' => 'Car does not exist'], 404);
    }
    $existingOrder = Tour::where('user_id', $user_id)
                         ->where('car_id', $car_id)
                         ->first();
    if ($existingOrder) {
        return response()->json([
            'message' => 'You have already a tour order for this car',
            'tour_order' => $existingOrder
        ], 400);
    }
    $data = $request->validate([
        'start_date' => 'required|date',
        'number_of_hours' => 'required|integer|min:1',
    ]);
    $data['user_id'] = $user_id;
    $data['car_id'] = $car_id;
    $data['total_price'] = $car->tourprice * $data['number_of_hours'];
    $newTourOrder = Tour::create($data);

    return response()->json([
        'message' => 'Tour Order Created',
        'tour_order' => $newTourOrder, 
    ]);
}

    function deleteOrder() {
        $user_id = request()->route('id');
        $car_id = request()->route('carID');
        $user = User::find($user_id);
        $car = Car::find($car_id);
        if(!$user) return response()->json([
            'message' => "user does not exist",
        ]);
        if(!$car) return response()->json([
            'message' => "car does not exist",
        ]);

        $deletedTourOrder = Tour::where('user_id', $user_id)->where('car_id', $car_id)->delete();

        if(!$deletedTourOrder) return response()->json([
            'message' => "Order does not exist",
        ]);

        return response()->json([
            'message' => "order deleted",
        ]);
    }
    function updateOrder(Request $request) {
        $user_id = request()->route('id');
        $car_id = request()->route('carID');
        $user = User::find($user_id);
        $car = Car::find($car_id);
        if(!$user) return response()->json([
            'message' => "user does not exist",
        ]);
        if(!$car) return response()->json([
            'message' => "car does not exist",
        ]);
        $data =$request->validate([
            'start_date' => 'required|date',
            'number_of_hours' =>'required|integer|min:1',
        ]);
        $data['total_price'] = $car->tourprice * $data['number_of_hours'];

        $updatedOrder = Tour::where('user_id', $user_id)->where('car_id', $car_id)->update($data);

        if(!$updatedOrder) return response()->json([
            'message' => "Order does not exist",
        ]);


        return response()->json([
            'message' => "order updated",
        ]);

    }


}
