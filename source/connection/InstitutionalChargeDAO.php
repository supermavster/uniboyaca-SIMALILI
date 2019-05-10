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

    final public static function updateInstitutionalCharge($values)
    {
        $idPerson = $values['id'];
        $values = $values['institutionalcharge'];
        $sql = "UPDATE `institutionalcharge` SET `charge` = '$values[position]', `initDate` = '$values[initDate]', `endDate` = '$values[endDate]',`enable` = '$values[enable]' WHERE `institutionalcharge`.`idPerson` = $idPerson;";
        return $sql;
    }

}

new InstitutionalChargeDAO();
