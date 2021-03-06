<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\Cars;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $cars;

    public function __construct(Cars $cars)
    {
        $this->cars = $cars;
    }

    public function index()
    {
        $cars = $this->cars->index();

        return view('cars.index', with([
            'cars' => $cars
        ]));
    }

    public function create()
    {
        $car = null;

        return view('cars.create', with([
            'car' => $car
        ]));
    }

    public function store(Request $request)
    {
        $params = $this->toValidate($request);

        $car = $this->cars->store($params);

        return redirect(route('cars.show', $car->_id));
    }

    public function show($id)
    {
        $car = $this->cars->show($id);

        return view('cars.show', with([
            'car' => $car
        ]));
    }

    public function edit($id)
    {
        $car = $this->cars->show($id);

        return view('cars.edit', with([
            'car' => $car
        ]));
    }

    public function update(Request $request, $id)
    {
        $params = $this->toValidate($request);

        $car = $this->cars->update($params, $id);

        return redirect(route('cars.show', $car->_id));
    }

    public function toValidate($request)
    {
        return $this->validate($request, [
            'brand' => 'required|max:50',
            'model' => 'required|max:75',
            'year' => 'required',
            'color' => 'required|max:20',
            'value' => 'nullable|numeric'
        ]);
    }
}
