<?php
namespace App\Services;

use App\App;

class Model {

    const TABLE = 'users';

    /**
     * Metodas grazinantis service objekta, pagal paduota id.
     * @param int $id
     * @return User|null
     */
    public static function get(int $id): ?Service
     {
         if ($row = App::$db->getRowById(self::TABLE, $id)) {
             return new Service($row);
         } else {
             return null;
         }
     }

    /**
      * Metodas irasantis service duomenis i atitinkama table'a.
      * @param Service $service
      * @return bool|int
      */
    public static function insert(Service $service)
    {
        return App::$db->insertRow(self::TABLE, $service->_getData());
    }

    /**
     * Metodas grazinantis service objektu masyva, kurie atitinka nurodytus kriterijus.
     * @param array $conditions
     * @return array|null
     */
     public static function getWhere(array $conditions = []): ?array
     {
         $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
         $services = [];

         foreach($rows as $row){
             $services[] = new Service($row);
         }
         return $services;
     }

     /**
     * Metodas atnaujinantis userio duomenis.
     * @param Service $service
     */
     public static function update(Service $service): void
     {
         App::$db->updateRow(self::TABLE, $service->getId(), $service->_getData());
     }

    /**
     * Metodas istrinantis nurodyta useri.
     * @param Service $service
     */
     public static function delete(Service $service): void
     {
         App::$db->deleteRow(self::TABLE, $service->getId());
     }

}