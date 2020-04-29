GITHASH=`git log -1 --pretty=format:"%h" || echo "???"`
CURDATE=`date -u +%Y.%m.%d_%H:%M:%S`
VERSION=dev

APPVERSION=${VERSION}_${GITHASH}_${CURDATE}

run:
	docker-compose up --force-recreate --renew-anon-volumes --remove-orphans

up:
	docker-compose up --detach --force-recreate --renew-anon-volumes --remove-orphans

down:
	docker-compose down --volumes --remove-orphans
