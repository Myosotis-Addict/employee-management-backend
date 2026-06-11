<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    //GET /api/employees
    public function index(): JsonResponse
    {
        $employees = Employee::latest()->get();
        return response()->json($employees, 200);
    }

    //GET /api/employees/{id}
    public function show($id): JsonResponse
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json([
                'message' => 'Karyawan tidak ditemukan',
            ], 404);
        }
        return response()->json($employee, 200);
    }

    //POST /api/employees
    public function store(StoreEmployeeRequest $request): JsonResponse
    {
        $employee = Employee::create($request->validated());
        return response()->json([
            'message' => 'Karyawan berhasil didaftarkan',
            'data' => $employee
        ], 201);
    }

    //PUT /api/employees/{id}
    public function update(UpdateEmployeeRequest $request, $id): JsonResponse
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json([
                'message' => 'Karyawan tidak ditemukan',
            ], 404);
        }
        $employee->update($request->validated());
        return response()->json([
            'message' => 'Karyawan berhasil diperbarui',
            'data' => $employee
        ], 200);
    }

    //DELETE /api/employees/{id}
    public function destroy($id): JsonResponse
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json([
                'message' => 'Karyawan tidak ditemukan',
            ], 404);
        }
        $employee->delete();
        return response()->json([
            'message' => 'Karyawan berhasil dihapus',
        ], 200);
    }
}
