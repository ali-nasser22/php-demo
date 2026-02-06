<?php

namespace helpers\enums;

enum HttpStatus: int
{
    case OK = 200;
    case CREATED = 201;
    case BAD_REQUEST = 401;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;

    public function label(): string
    {
        return match ($this) {
            self::OK => "OK",
            self::CREATED => "Created",
            self::BAD_REQUEST => "Bad Request",
            self::FORBIDDEN => "Forbidden",
            self::NOT_FOUND => "Not Found",
        };
    }

}
