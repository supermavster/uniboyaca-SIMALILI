<?php

class InstitutionalChargeDAO
{
    final public static function getMaxID()
    {
        return "SELECT MAX(idPerson) FROM institutionalcharge;";
    }

    final public static function addInstitutionalCharge($values)
    {
        $sql = "INSERT INTO `institutionalcharge` (`idPerson`, `charge`, `initDate`, `endDate`, `enable`) VALUES ($values[idPerson] ,";
        $values = $values['institutionalcharge'];
        $tempValue = 0;
        foreach ($values as $valor) {
            $sql .= "'$valor'";
            if ($tempValue++ == count($values) - 1) {
                $sql .= ");";
                break;
            } else {
                $sql .= ",";
            }
        }
        return $sql;
    }

}

new InstitutionalChargeDAO();
