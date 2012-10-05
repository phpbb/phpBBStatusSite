echo "Git Status:"
git status
echo ""
echo "composer.phar Update:"
php composer.phar self-update
echo ""
echo "Deps update:"
php composer.phar update
echo ""
echo "Git stage .lock & .phar:"
git add composer.lock
git add composer.phar
echo ""
echo "Commit changes:"
git commit -m 'Updating deps'
echo ""
echo "COMPLETE!"
