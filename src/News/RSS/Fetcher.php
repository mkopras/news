<?php

namespace News\RSS;

use News\Item;

class Fetcher
{
    public function getLatest($page = 1)
    {
        return [
            new Item('Szarpanina i pyskówka w autobusie. "4 kobiety ukarane mandatami"', 'Pasażerowie autobusu linii 190 pewnie na długo zapamiętają piątkowy kurs. Podczas jazdy doszło do szarpaniny i pyskówki między kilkoma pasażerami. Cztery kobiety policja ukarała mandatami. Zajście zarejestrował internauta "maciok", który film wysłał na Kontakt 24.', 'pl', new \DateTime(), 'http://www.tvnwarszawa.pl/informacje,news,szarpanina-i-pyskowka-w-autobusie-4-kobiety-ukarane-mandatami,180656.html')
        ];
    }
}