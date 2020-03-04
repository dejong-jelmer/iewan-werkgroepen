<?php
namespace App\Http\Boxes;
use Auth;
abstract class Boxes
{
    public function loadView($params = null)
    {
        return $this->view()->with($this->buildViewData($params));
    }

    public function view()
    {
        $name = \Str::kebab(class_basename($this));
        return view("boxes.{$name}");
    }

    protected function buildViewData($params = null)
    {
        $viewData = [];
        if(!is_null($params)) {
            foreach ($params as $key => $value) {
                $viewData[$key] = $value;
            }
        }
        foreach ((new \ReflectionClass($this))->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            $viewData[$property->getName()] = $property->getValue($this);
        }
        foreach ((new \ReflectionClass($this))->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
            if (!in_array($name = $method->getName(), ['loadView', 'view'])) {
                $viewData[$name = $method->getName()] = $this->$name();
            }
        }
        return $viewData;
    }
}
