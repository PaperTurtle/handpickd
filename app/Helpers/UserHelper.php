<?php

function getUserInitials(string $name): string
{
    return collect(explode(' ', $name))
        ->map(fn ($word) => strtoupper(substr($word, 0, 1)))
        ->join('');
}
