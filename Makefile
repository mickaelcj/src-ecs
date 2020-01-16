# Be careful with this command (nfs/debug shared folder should be disabled)
clean_vagrant:
	/bin/bash /tmp/cleaner.sh

# Mettre à jour notre base de donnée locale avec celles de l'externe
db_update_local:
	mysqldump -t --insert-ignore -u EmwnLitSLR  -pGk0qCm6hFI  -h remotemysql.com EmwnLitSLR > /data/ecs/dumpR.sql
	mysql -u ecs_user -pecommerce -h 127.0.0.1 ecommerce < /data/ecs/dumpR.sql &

# Mettre à jour la base de donnée externe avec nos datas
db_update_remote:
	mysqldump -t --insert-ignore --skip-opt -u ecs_user  -pecommerce  -h 127.0.0.1 ecommerce > /data/ecs/dumpL.sql
	mysql -u EmwnLitSLR -pGk0qCm6hFI -h remotemysql.com EmwnLitSLR < /data/ecs/dumpL.sql &


