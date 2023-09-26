<?php
namespace Robo\RoboRnd;

class Random {
    const NUMBER = '0123456789';
    const ALPHA  = 'abcdefghijklmnopqrstuvwxyz';
    const CROCKFORD = 'ABCDEFGHJKMNPQRSTVWXYZ';
    const MODHEX = 'cbdefghijklnrtuv';
    const MITTWALD = '$!#%*+,-.;_:/';
    const ANYCHAR = '~!@#$%^&*()-_=+[]{}|;:,./<>?';

    function buildAlphabet($type, $lohi=0) {
        switch($type) {
            case 'num':
                return self::NUMBER;
            case 'alpha':
                $alp = '';
                if($lohi & 2) $alp .= strtoupper(self::ALPHA);
                if($lohi & 1) $alp .= self::ALPHA;
                if(!$lohi) $alp .= self::ALPHA;
                return $alp;
            case 'crockford':
                $alp = self::NUMBER;
                if($lohi & 2) $alp .= self::CROCKFORD;
                if($lohi & 1) $alp .= strtolower(self::CROCKFORD);
                if(!$lohi) $alp .= self::CROCKFORD;
                return $alp;
            case 'modhex':
                $alp = '';
                if($lohi & 2) $alp .= strtoupper(self::MODHEX);
                if($lohi & 1) $alp .= self::MODHEX;
                if(!$lohi) $alp .= self::MODHEX;
                return $alp;
            case 'mittwald':
                $alp = self::NUMBER . self::MITTWALD;
                if($lohi & 2) $alp .= strtoupper(self::ALPHA);
                if($lohi & 1) $alp .= self::ALPHA;
                if(!$lohi) $alp .= self::ALPHA;
                return $alp;
            case 'anychar':
                $alp = self::NUMBER . self::ANYCHAR;
                if($lohi & 2) $alp .= strtoupper(self::ALPHA);
                if($lohi & 1) $alp .= self::ALPHA;
                if(!$lohi) $alp .= self::ALPHA;
                return $alp;
            case 'alnum':
            default:
                $alp = self::NUMBER;
                if($lohi & 2) $alp .= strtoupper(self::ALPHA);
                if($lohi & 1) $alp .= self::ALPHA;
                if(!$lohi) $alp .= self::ALPHA;
                return $alp;    
        }
    }

    function random($len, $type='', $lohi=0) {
        $alp = $this->buildAlphabet($type, $lohi);
        $rnd = '';
        for($i = 0; $i < $len; $i++) {
            $x = random_int(0, strlen($alp)-1);
            $rnd .= $alp[$x];
        }
        return $rnd;
    }

}
