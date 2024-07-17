<?php
namespace App\Security;

use App\Entity\Article;
use App\Entity\Trainer;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Bundle\SecurityBundle\Security;

class ArticleVoter extends Voter
{
    const VIEW = 'view';
    const EDIT = 'edit';
    const SHOW = 'show';

    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        if (!in_array($attribute, [self::VIEW, self::EDIT, self::SHOW])) {
            return false;
        }

        if (!$subject instanceof Article) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        if (!$user instanceof Trainer || !$user instanceof User) {
            return false;
        }

        /** @var Article $article */
        $article = $subject;
        dump($article);
        dump($user === $article->getOwner());   
        dd($article->getTrainer()->getFirstName());

        return match($attribute) {
            self::VIEW => $this->canView($article, $user),
            self::EDIT => $this->canEdit($article, $user),
            self::SHOW => $this->canShow($article, $user),
            default => throw new \LogicException('This code should not be reached!')
        };
    }

    private function canView(Article $article, User $user): bool
    {
        // if they can edit, they can view
        if ($this->canEdit($article, $user)) {
            return true;
        }

        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        // Assuming the Article entity has an isPrivate method
        return true;
    }

    private function canEdit(Article $article, User $user): bool
    {
        // Assuming the Article entity has a getOwner method
        //return $user === $article->getOwner();

        return true;
    }

    private function canShow(Article $article, User $user): bool
    {
        if ($this->canEdit($article, $user)) {
            return true;
        }

        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        // Assuming the Article entity has an isPrivate method
        return true;
    }

}
