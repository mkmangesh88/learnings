<?php

/*---------------------------------------------- Definition ----------------------------------------------------
Bridge is a structural design pattern that lets you split a large class or a set of closely related classes into 
two separate hierarchies—abstraction and implementation—which can be developed independently of each other.
 Reference - https://refactoring.guru/design-patterns/bridge
---------------------------------------------------------------------------------------------------------------*/
class RemoteControl {

    protected $device;
    public function __construct( $device ) {
        $this->device = $device;
    }

    public function powerToggle() {
        if($this->device->isEnabled()) {
            $this->device->disable();
        } else {
            $this->device->enable();
        }
    }

    public function setVolume( $unit ) {
        $this->device->setVolume( $this->device->getVolume() + $unit );
    }

}

class AdvancedRemote extends RemoteControl {
    public function mute() {
        $this->device->setVolume(0);
    }
}

interface Device {
    public function enable();
    public function disable();
    public function isEnabled();
    public function getVolume();
    public function setVolume( $unit );
}

class TV implements Device {
    protected $intEnable;
    protected $intVolume;

    public function enable() {
        $this->intEnable = 1;
        echo '<br> TV is turned on';
    }

    public function disable() {
        $this->intEnable = 0;
        echo '<br> TV is turned off';
    }

    public function isEnabled() {
        return $this->intEnable == 1;
    }

    public function getVolume() {
        return $this->intVolume;
    }

    public function setVolume( $unit ) {
        $this->intVolume = $unit;
        echo '<br> TV volume updated to ' . $unit;
    }
}

class Radio implements Device {
    protected $intEnable;
    protected $intVolume;

    public function enable() {
        $this->intEnable = 1;
        echo '<br> Radio is turned on';
    }

    public function disable() {
        $this->intEnable = 0;
        echo '<br> Radio is turned off';
    }

    public function isEnabled() {
        return $this->intEnable == 1;
    }

    public function getVolume() {
        return $this->intVolume;
    }

    public function setVolume( $unit ) {
        $this->intVolume = $unit;
        echo '<br> Radio volume updated to ' . $unit;
    }
}


$objTv = new TV();
$objRadio = new Radio();

$objTVRemote = new RemoteControl( $objTv );
$objRadioRemote = new RemoteControl( $objRadio );

// power on devices
$objTVRemote->powerToggle();
$objRadioRemote->powerToggle();

//change devices volume 
$objTVRemote->setVolume( 45 );
$objRadioRemote->setVolume( 23 );

// power off devices
$objTVRemote->powerToggle();
$objRadioRemote->powerToggle();

/*--------------- OUTPUT ---------------
TV is turned on
Radio is turned on
TV volume updated to 45
Radio volume updated to 23
TV is turned off
Radio is turned off
---------------------------------------*/

