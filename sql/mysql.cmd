mysql -u root -e "create database ccpanel_db; GRANT ALL PRIVILEGES ON ccpanel_db.* TO ccpanel_db@localhost IDENTIFIED BY '121112'"
cat mysql.sql | mysql -u root ccpanel_db