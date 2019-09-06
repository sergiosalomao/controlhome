<?php

namespace App\Controller;

class SensoresController extends Controller
{
    public function showTemperatura()
    {
        $this->layout();
        $this->render("sensores",'temperatura');
    }

    public function showPresenca()
    {
        $this->layout();
        $this->render("sensores",'presenca');
    }

    public function showNivelAgua()
    {
        $this->layout();
        $this->render("sensores",'agua');
    }

    public function showPorta()
    {
        $this->layout();
        $this->render("sensores",'porta');
    }

    public function showEnergia()
    {
        $this->layout();
        $this->render("sensores",'energia');
    }

}
