<?php

namespace App\Entity;

enum Status: String
{
    case NEW = 'New';
    case IN_PROGRESS = 'In Progress';
    case RESOLVED = 'Resolved';
    case REJECTED = 'Rejected';
}
