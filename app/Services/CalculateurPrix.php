<?php

namespace App\Services;

class CalculateurPrix
{
    /**
     * Calcule le prix TTC à partir d'un prix HT et d'un taux de taxe.
     * Le taux de taxe est exprimé en décimal (ex: 0.15 pour 15%).
     *
     * @throws \InvalidArgumentException si le taux est négatif
     */
    public function calculerAvecTaxe(float $prixHT, float $tauxTaxe): float
    {
        if ($tauxTaxe < 0) {
            throw new \InvalidArgumentException('Le taux de taxe ne peut pas être négatif.');
        }

        return round($prixHT * (1 + $tauxTaxe), 2);
    }

    public function appliquerRemise(float $prix, float $remisePourcentage): float
    {
        if ($remisePourcentage < 0) {
            throw new \InvalidArgumentException('Le pourcentage de remise ne peut pas être négatif.');
        }

        $prixApresRemise = $prix * (1 - $remisePourcentage / 100);

        return max(0, round($prixApresRemise, 2)); // On s'assure que le prix ne soit pas négatif
    }

    public function respecteSeuilMinimum(float $prix, float $seuil): bool
    {
        if ($seuil < 0) {
            throw new \InvalidArgumentException('Le seuil minimum ne peut pas être négatif.');
        }

        return $prix >= $seuil;
    }
}
