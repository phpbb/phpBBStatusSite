echo "Git Status:"
git status -sb
echo ""
echo "composer.phar Update:"
php composer.phar self-update
echo ""
echo "Deps update:"
php composer.phar update --dev
echo ""
echo "Git stage .lock & .phar:"
git add composer.lock
git add composer.phar
echo ""
echo "Commit changes:"
git commit -m 'Updating deps'
echo ""
echo "COMPLETE!"
