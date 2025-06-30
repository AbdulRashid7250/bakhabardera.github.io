#!/data/data/com.termux/files/usr/bin/bash

# ✅ ویب سائٹ فولڈر کا راستہ
cd ~/blog-site || { echo "📁 blog-site فولڈر نہیں ملا"; exit 1; }

# ✅ Git init & remote
git init
git branch -M main
git remote remove origin 2>/dev/null
git remote add origin https://github.com/AbdulRashid7250/bakhabardera.github.io.git

# ✅ فائلز شامل کریں
git add .
git commit -m "Deploy by Abdul Rashid from Termux"

# ✅ ٹوکن یہاں پیسٹ کریں ( ghp_xxx... )
read -p "🔐 اپنا GitHub Token پیسٹ کریں: " token

# ✅ push کریں GitHub پر
git push https://AbdulRashid7250:$token@github.com/AbdulRashid7250/bakhabardera.github.io.git main
