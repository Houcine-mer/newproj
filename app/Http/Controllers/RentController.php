<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;

class RentController extends Controller
{
    //
    function loadAllRentOrders() {
        $id = request()->route('id');
        $user = User::find($id);
        if(!$user) return response()->json([
            'message' => "user does not exist",
        ]);
        $userRentOrders = $user->rentedCars()
        ->withPivot(['start_date', 'number_of_days', 'total_price'])
        ->get();
        return response()->json($userRentOrders);
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
    $existingOrder = Rent::where('user_id', $user_id)
                         ->where('car_id', $car_id)
                         ->first();
    if ($existingOrder) {
        return response()->json([
            'message' => 'You have already a rent order for this car',
            'rent_order' => $existingOrder
        ], 400);
    }
    $data = $request->validate([
        'start_date' => 'required|date',
        'number_of_days' => 'required|integer|min:1',
    ]);
    $data['user_id'] = $user_id;
    $data['car_id'] = $car_id;
    $data['total_price'] = $car->rentprice * $data['number_of_days'];
    $newRentOrder = Rent::create($data);

    return response()->json([
        'message' => 'Rent Order Created',
        'rent_order' => $newRentOrder, 
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

        $deletedRentOrder = Rent::where('user_id', $user_id)->where('car_id', $car_id)->delete();

        if(!$deletedRentOrder) return response()->json([
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
            'number_of_days' =>'required|integer|min:1',
        ]);
        $data['total_price'] = $car->rentprice * $data['number_of_days'];

        $updatedOrder = Rent::where('user_id', $user_id)->where('car_id', $car_id)->update($data);

        if(!$updatedOrder) return response()->json([
            'message' => "Order does not exist",
        ]);


        return response()->json([
            'message' => "order updated",
        ]);

    }


}
