<?php

/** Affiche le titre du jeu.
 * @return string Le titre du jeu.
 */
function titre(): string
{
    return "
  _____               _       
 |  __ \             | |      
 | |__) |__ _ __   __| |_   _
 |  ___/ _ \ '_ \ / _` | | | |
 | |  |  __/ | | | (_| | |_| |
 |_|   \___|_| |_|\__,_|\__,_|\n";
}

/**
 * @param int $vies Le nombre de vies.
 * @return string Un dessin en fonction du nombre de vies.
 */
function dessinPendu(int $vies):string
{
    return match ($vies) {
        0 => " 
    ____
   |    |      
   |    o \e[31m eerk... \e[0m
   |   /|\     
   |    |
   |   / \
  _|_
 |   |______
 |          |
 |__________|\n",
        1 => "
    ____
   |    |      
   |    o      
   |   /|\     
   |    |
   |    
  _|_
 |   |______
 |          |
 |__________|\n",
        2 => "
    ____
   |    |      
   |    o      
   |    |
   |    |
   |     
  _|_
 |   |______
 |          |
 |__________|\n",
        3 => "
    ____
   |    |      
   |    o      
   |        
   |   
   |   
  _|_
 |   |______
 |          |
 |__________|\n",
        4 => "
    ____
   |    |      
   |      
   |      
   |  
   |  
  _|_
 |   |______
 |          |
 |__________|\n",
        5 => "
    ____
   |        
   |        
   |        
   |   
   |   
  _|_
 |   |______
 |          |
 |__________|\n",
        6 => "
    
   |     
   |     
   |     
   |
   |
  _|_
 |   |______
 |          |
 |__________|\n",
        7 => "
        
        
           
            
            
  _ _
 |   |______
 |          |
 |__________|\n",
        default => "",
    };
}
