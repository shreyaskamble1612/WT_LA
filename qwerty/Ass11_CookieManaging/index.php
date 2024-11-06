<?php
// cookie_management.php

class CookieManager
{
    private $defaultExpiry = 2592000;

    public function setCookie($name, $value, $expiry = null)
    {
        $expiry = $expiry ?? time() + $this->defaultExpiry;
        setcookie($name, $value, $expiry, '/', '', true, true);
        return true;
    }
    public function getCookie($name)
    {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
    }

    public function hasCookie($name)
    {
        return isset($_COOKIE[$name]);
    }

    public function deleteCookie($name)
    {
        if ($this->hasCookie($name)) {
            setcookie($name, '', time() - 3600, '/');
            return true;
        }
        return false;
    }

    public function setUserPreferences($theme, $language)
    {
        $preferences = [
            'theme' => $theme,
            'language' => $language,
            'last_updated' => date('Y-m-d H:i:s')
        ];

        $this->setCookie('user_preferences', json_encode($preferences));
    }

    public function getUserPreferences()
    {
        $preferences = $this->getCookie('user_preferences');
        return $preferences ? json_decode($preferences, true) : null;
    }
}

$cookieManager = new CookieManager();

$cookieManager->setCookie('username', 'john_doe');
$cookieManager->setUserPreferences('dark', 'en');

sleep(1);

echo "Cookie Management Demo:\n";
echo "=====================\n\n";

if ($cookieManager->hasCookie('username')) {
    echo "Username cookie value: " . $cookieManager->getCookie('username') . "\n";
}

$preferences = $cookieManager->getUserPreferences();
if ($preferences) {
    echo "\nUser Preferences:\n";
    echo "Theme: " . $preferences['theme'] . "\n";
    echo "Language: " . $preferences['language'] . "\n";
    echo "Last Updated: " . $preferences['last_updated'] . "\n";
}


?>