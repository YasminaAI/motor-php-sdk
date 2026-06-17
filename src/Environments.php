<?php

namespace Yasminaai;

enum Environments: string
{
    case Sandbox = "https://sandbox.yasmina.ai/api/v1/car-comp";
    case Production = "https://production.yasmina.ai/api/v1/car-comp";
}
