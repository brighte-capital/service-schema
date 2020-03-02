<?php

namespace BrighteCapital\ServiceSchema\Event;

use BrighteCapital\ServiceSchema\Json\Exception\JsonException;
use BrighteCapital\ServiceSchema\Json\JsonReader;

class EventFactory
{

    /**
     * @param string|null $json
     * @return false|\BrighteCapital\ServiceSchema\Event\Event
     * @throws \BrighteCapital\ServiceSchema\Json\Exception\JsonException
     */
    public function createEvent(string $json = null)
    {
        if (empty($json)) {
            throw new JsonException(JsonException::MISSING_JSON_CONTENT);
        }

        $object = JsonReader::decode($json);

        if (!$this->validate($object)) {
            throw new JsonException(JsonException::INVALID_JSON_CONTENT . $json);
        }

        return new Event([
            'id' => isset($object->id) ? $object->id : null,
            'name' => isset($object->name) ? $object->name : null,
            'time' => isset($object->time) ? $object->time : null,
            'payload' => isset($object->payload) ? $object->payload : null,
            'source' => isset($object->source) ? $object->source : null,
            'description' => isset($object->description) ? $object->description : null,
            'status' => isset($object->status) ? $object->status : null,
            'sagaId' => isset($object->sagaId) ? $object->sagaId : null,
            'attributes' => isset($object->attributes) ? (array) $object->attributes : null
        ]);
    }

    /**
     * @param null|\stdClass $object
     * @return bool
     */
    public function validate(\stdClass $object = null)
    {
        if (!is_object($object)) {
            return false;
        }

        return true;
    }
}