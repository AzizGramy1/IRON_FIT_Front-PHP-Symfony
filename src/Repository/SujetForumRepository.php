<?php

namespace App\Repository;

use App\Entity\SujetsForum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SujetsForum>
 *
 * @method SujetsForum|null find($id, $lockMode = null, $lockVersion = null)
 * @method SujetsForum|null findOneBy(array $criteria, array $orderBy = null)
 * @method SujetsForum[]    findAll()
 * @method SujetsForum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SujetsForumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SujetsForum::class);
    }

    // Example method to find by a specific field
    public function findByTheme(string $theme): ?array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.theme = :theme')
            ->setParameter('theme', $theme)
            ->orderBy('s.dateCreations', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // Example method to find with pagination
    public function findWithPagination(int $page, int $limit): array
    {
        return $this->createQueryBuilder('s')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
