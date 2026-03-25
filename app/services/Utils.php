<?php

class Utils
{
    public static function redirect(string $action, array $params = []): void
    {
        $url = "index.php?action=$action";
        foreach ($params as $paramName => $paramValue) {
            $url .= "&$paramName=$paramValue";
        }
        header("Location: $url");
        exit();
    }

    public static function request(string $variableName, mixed $defaultValue = null): mixed
    {
        return $_REQUEST[$variableName] ?? $defaultValue;
    }

    public static function formatMessageDate(string $sqlDate): string
    {
        try {
            $dt = new DateTime($sqlDate);
        } catch (Exception $e) {
            return $sqlDate; // fallback si format inattendu
        }

        // Format demandé : "jour/mois heure:minutes"
        // ex: "23/03 15:48"
        return $dt->format('d/m H:i');
    }
    public static function membreDepuis(?string $dateInscription): string
    {
        if (empty($dateInscription)) {
            return '';
        }

        try {
            $start = new DateTime($dateInscription);
            $now = new DateTime();

            // si jamais la date est dans le futur (ou bug), on évite une phrase bizarre
            if ($start > $now) {
                return "Membre depuis 0 jour";
            }

            $diff = $start->diff($now);

            // Années
            if ($diff->y >= 2) {
                return "Membre depuis {$diff->y} ans";
            }
            if ($diff->y === 1) {
                return "Membre depuis 1 an";
            }

            // Mois
            if ($diff->m >= 2) {
                return "Membre depuis {$diff->m} mois";
            }
            if ($diff->m === 1) {
                return "Membre depuis 1 mois";
            }

            // Jours
            if ($diff->d >= 2) {
                return "Membre depuis {$diff->d} jours";
            }
            if ($diff->d === 1) {
                return "Membre depuis 1 jour";
            }

            return "Membre depuis aujourd'hui";
        } catch (Exception $e) {
            return '';
        }
    }
}
