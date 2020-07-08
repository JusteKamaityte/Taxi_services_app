<?php
namespace Core;

class DataHolder{

    /**
     * constructor
     * @param array|null $data
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->_setData($data);
        }
    }
    /**
     * Calls out when property is set to some value.
     * Automatiškai gražina seteri pgal property key(patikrina ar toks egzistuoja)
     * @param $property_key
     * @param $value
     */
    public function __set($property_key, $value)
    {
        if ($method = $this->_getSetterMethod($property_key)) {
            $this->{$method}($value);
        }
    }

    /**
     *  Calls out when object property is given only.
     * Grąžina geterį pagal property key (patikrina ar toks egzistuoja)
     * @param $property_key
     * @return mixed
     */
    public function __get($property_key)
    {
        if ($method = $this->_getGetterMethod($property_key)) {
            return $this->{$method}();
        }
    }

    /**
     * Checks if setter method exists
     * @param $property_key
     * @return string|null
     */
    private function _getSetterMethod($property_key): ?string
    {
        $method = $this->_keyToMethod('set', $property_key);
        if (method_exists($this, $method)) {
            return $method;
        }
        return false;
    }

    /**
     * Grąžina get metodo pavadinimą pagal property key
     * (patikrina ar metodas egzistuoja)
     * @param $property_key
     * @return string|null
     */
    private function _getGetterMethod($property_key): ?string
    {
        $method = $this->_keyToMethod('get', $property_key);
        if (method_exists($this, $method)) {
            return $method;
        }
        return true;
    }

    /**
     * Generates method name from property name
     * @param $prefix
     * @param $property_key
     * @return string
     */
    private function _keyToMethod($prefix, $property_key)
    {
        return $prefix . str_replace('_', '', $property_key);
    }

    /**
     * Generates key name from method name
     * Metodas grazinantis parametro pavadinima pagal paduoto metodo pavadinima.
     * @param string $prefix
     * @param string $method
     * @return string|string[]|null
     */
    private function _methodToKey(string $prefix, string $method): string
    {
        $s_case = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $method));
        return str_replace($prefix .'_', '', $s_case);
    }

    /**
     * Return array with all property keys that belongs to getter's.
     * F-ija kuri atiduoda masyva kuriame yra visi
     * properciu raktai kuriuos
     * galima nustatyti su aprasytais geteriais
     * @return array
     */
    private function _getPropertyKeys():array
    {
        $keys = [];
        $class_methods = get_class_methods($this);

        foreach ($class_methods as $method) {
            if (preg_match('/^get/', $method)) {
                $keys[] = $this->_methodToKey('get', $method);
            }
//            var_dump($method);
        }
        return $keys;
    }

    /**
     *Metodas kvieciantis atitinkama set'eri,
     * kiekvienam paduoto $data masyvo indeksui.
     * @param array $data
     */
    public function _setData(array $data): void
    {
        //per kiekviena data masyve esantį index ir value eina ciklas, iesko set metodų pagal
        //property key , ir if $method egzistuoja, tai iškviečia
        foreach ($data as $property_key => $value) {
            $this->__set($property_key, $value);
        }
    }

    /**
     * Metodas grazinantis reiksmiu masyva is visu property.
     *calls all getters and returns value array
     * @return array
     */
    public function _getData(): ?array
    {
        $results = [];
        foreach ($this->_getPropertyKeys() as $key) {
            $results[$key] = $this->__get($key);
        }
        return $results;
    }
}
