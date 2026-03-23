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
}
