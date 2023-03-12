<?php

namespace App\Service;

use App\Entity\News;


class NewsDateComparison
{
    public function compareNewsCreationDate(News $news1, News $news2): int
    {
        if ($news1->getCreationDate() < $news2->getCreationDate())
            return 1;
        else if ($news1->getCreationDate() > $news2->getCreationDate())
            return -1;
        else
            return 0;
    }
}
