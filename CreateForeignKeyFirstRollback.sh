#!bin/bash

cp asdf/desctop/SeedManagement/2_ForeignKey/* config/Seeds/
bin/cake migrations seed
rm config/Seeds/*

cp asdf/desctop/SeedManagement/3_ForeignKey/* config/Seeds/
bin/cake migrations seed
rm config/Seeds/*

cp asdf/desctop/SeedManagement/4_ForeignKey/* config/Seeds/
bin/cake migrations seed
rm config/Seeds/*

exit 0
