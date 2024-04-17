<?php

class EventManagementSystem {
    private $events = [];
    
    public function requestEvent($eventName, $eventDate, $eventDescription) {
        $request = [
            'name' => $eventName,
            'date' => $eventDate,
            'description' => $eventDescription,
            'status' => 'pending'
        ];
        
        array_push($this->events, $request);
        echo "Event request sent for approval.\n";
    }
    
    public function approveEvent($eventName) {
        foreach ($this->events as &$event) {
            if ($event['name'] === $eventName) {
                $event['status'] = 'approved';
                echo "Event '$eventName' has been approved.\n";
                return;
            }
        }
        
        echo "Event '$eventName' not found.\n";
    }
    
    public function denyEvent($eventName) {
        foreach ($this->events as &$event) {
            if ($event['name'] === $eventName) {
                $event['status'] = 'denied';
                echo "Event '$eventName' has been denied.\n";
                return;
            }
        }
        
        echo "Event '$eventName' not found.\n";
    }
    
    public function getEvents() {
        return $this->events;
    }
}

// Example usage:
$ems = new EventManagementSystem();

$ems->requestEvent("Conference", "2024-05-15", "Annual conference for tech enthusiasts.");
$ems->requestEvent("Workshop", "2024-06-20", "Hands-on workshop on web development.");

$ems->approveEvent("Conference");
$ems->denyEvent("Workshop");

print_r($ems->getEvents());
?>
