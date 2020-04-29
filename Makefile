GITHASH=`git log -1 --pretty=format:"%h" || echo "???"`
CURDATE=`date -u +%Y.%m.%d_%H:%M:%S`
VERSION=dev

APPVERSION=${VERSION}_${GITHASH}_${CURDATE}

install:
	cd api && composer install
	cd www && composer install

clean:
	api/yii cache/flush-all
	rm -rf api/vendor
	www/yii cache/flush-all
	rm -rf ./www/vendor

run:
	docker-compose up --force-recreate --renew-anon-volumes --remove-orphans

up:
	docker-compose up --detach --force-recreate --renew-anon-volumes --remove-orphans

down:
	docker-compose down --volumes --remove-orphans
