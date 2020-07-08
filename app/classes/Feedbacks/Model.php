<?php

namespace App\Feedbacks;
use App\App;

class Model
{

     const TABLE = 'users';

    /**
    * Metodas grazinantis feedback objekta, pagal paduota id.
    * @param int $id
    * @return Order|null
    */
   public static function get(int $id): ?Feedback
     {
         if ($row = App::$db->getRowById(self::TABLE, $id)) {
             return new Feedback($row);
         } else {
             return null;
         }
     }

    /**
     * Metodas irasantis feedback duomenis i atitinkama table'a.
     * @param Feedback $feedback
     * @return int|bool
     */
    public static function insert(Feedback $feedback){
        return App::$db->insertRow(self::TABLE, $order->_getData());
    }

    /**
     * Metodas grazinantis order'iu objektu masyva, kurie atitinka nurodytus kriterijus.
     * @param array $conditions
     * @return array|null
     */
    public static function getWhere(array $conditions = []): ?array
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $feedbacks = [];

        foreach($rows as $row){
            $feedbacks[] = new Feedback($row);
        }
        return $feedbacks;
    }

     /**
     * Metodas atnaujinantis order'io duomenis.
     * @param Feedback $feedback
     */
    public static function update(Feedback $feedback): void
    {
        App::$db->updateRow(self::TABLE, $feedback->getId(), $feedback->_getData());
    }

    /**
     * Metodas istrinantis nurodyta order'i.
     * @param Feedback $feedback
     */
    public static function delete(Feedback $feedback): void
    {
        App::$db->deleteRow(self::TABLE, $feedback->getId());
    }
}
