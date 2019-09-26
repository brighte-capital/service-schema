<?php

namespace ServiceSchema\Json\Exception;

use ServiceSchema\Exception\ServiceSchemaException;

class SchemaExporterException extends ServiceSchemaException
{
    const INVALID_SCHEMA_DIR = "Provided path is not a valid directory: ";
}
