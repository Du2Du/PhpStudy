<?php

/*namespace App\Helper\String;

trait FormataCpf
{

    public static function formatar($cpf)
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", Sanitization::sanitize($cpf));
    }

    public function formatarCpf($cpf)
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", Sanitization::sanitize($cpf));
    }

    public static function clear($doc)
    {
        return preg_replace("/[^0-9]/", "", $doc);
    }
}
