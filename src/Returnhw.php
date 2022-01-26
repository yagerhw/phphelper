<?php

namespace Yager\Phphelper;


class Returnhw
{
    public int $code;       // 错误码，0 = 成功，其他 = 失败
    public ?string $message;    // 错误消息
    public ?array $data;       // 数据

    public function __construct($code = 0, $message = "", $data = null)
    {
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }

    public function getArray(): array{
        return [
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->data
        ];
    }

    public function getJsonEncode(): string{
        return json_encode($this->getArray());
    }
}