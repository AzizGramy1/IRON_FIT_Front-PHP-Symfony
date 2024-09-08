<?php

namespace App\Repository;

use App\Entity\Forum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Forum>
 *
 * @method Forum|null find($id, $lockMode = null, $lockVersion = null)
 * @method Forum|null findOneBy(array $criteria, array $orderBy = null)
 * @method Forum[]    findAll()
 * @method Forum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Forum::class);
    }

    // Example method to find by a specific field
    public function findByAdminId(int $idUserAdmin): ?array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.idUserAdmin = :idUserAdmin')
            ->setParameter('idUserAdmin', $idUserAdmin)
            ->orderBy('f.dateCreationForum', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // Example method to find with pagination
    public function findWithPagination(int $page, int $limit): array
    {
        return $this->createQueryBuilder('f')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }


    // Method to search forums by ID or Date
    public function searchForums(string $search): array
    {
        $qb = $this->createQueryBuilder('f');

        if ($search) {
            $qb->where('f.idForum LIKE :search OR f.dateCreationForum LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }

        return $qb->getQuery()->getResult();
    }
}
