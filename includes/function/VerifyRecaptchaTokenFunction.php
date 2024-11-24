<?php
function VerifyRecaptchaToken($GToken)
{

    $Treshold = 0.5; // Score must be > threshold to pass captcha.
    // Default is 0.5, although the majority of users will get 0.9
    $Sites  = ["localhost", "dev.dinamikaus.com"]; // Site names string, e.g. sub.domain.com:8080

    $Secret = "6Le51QAjAAAAADkbmRI3I6t27aiktAezv6ObrVAi";
    $URL    = "https://www.google.com/recaptcha/api/siteverify";
    $Data   = array(
        "secret" => $Secret,
        "response" => $GToken
    );
    $Options = array(
        "http" => array(
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($Data)
        )
    );
    $Context = stream_context_create($Options);
    $Response = file_get_contents($URL, false, $Context);
    $ResponseKeys = json_decode($Response, true);

    // error checks
    if (isset($ResponseKeys["error-codes"])) {
        if (in_array("timeout-or-duplicate", $ResponseKeys["error-codes"])) return "expired";
        return $ResponseKeys["error-codes"];
    }

    // success check (theoretically not needed due to above error checks)
    if ($ResponseKeys["success"] !== true) return "invalid-token";

    // score check
    if ($ResponseKeys["score"] < $Treshold) return "failed";

    // hostname check
    if (!in_array($ResponseKeys["hostname"], $Sites)) return "wrong-site";

    // action check
    if ($ResponseKeys["action"] !== "submit") return "wrong-action";

    return true;
}
