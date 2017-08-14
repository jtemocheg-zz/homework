<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleXMLElement;

class EmployeeController extends Controller
{
    protected $json;

    public function __construct()
    {
        $path = storage_path() . "/employees.json";
        $this->json = json_decode(file_get_contents($path), true);
    }

    public function index()
    {
        $employees = $this->json;

        return view('employee.index', compact('employees'));
    }

    public function show($id)
    {
        $employee = $this->json[array_search($id, array_column($this->json, 'id'))];
        return view('employee.show', compact('employee'));
    }

    /**
     * Web service
     *
     * <?xml version="1.0" encoding="utf-8"?>
     * <employee>
     * <salarystart>1000</salarystart>
     * <salaryend>1500</salaryend>
     * </employee>
     *
     * @return mixed
     */
    public function service()
    {
        $xml = new SimpleXMLElement(request()->getContent());

        $employees = [];
        foreach ($this->json as $item) {
            $salary = str_replace('$', '', $item['salary']);
            $salary = str_replace(',', '', $salary);

            if ($salary > (integer)$xml->salarystart and $salary < (integer)$xml->salaryend) {
                $employees[] = $item;
            }
        }

        return response($employees, 200)
            ->header('Content-Type', 'text/xml');
    }
}
