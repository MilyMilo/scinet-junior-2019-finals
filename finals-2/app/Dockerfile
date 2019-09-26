FROM php:7.3-apache

RUN useradd -s /bin/bash -m vader

COPY --chown=vader:vader . /var/www/html/

ENV PORT 8000

# SUID for vim, https://gtfobins.github.io/gtfobins/vim/#shell
RUN apt-get update \
    && apt-get install vim python3 -y \
    && mv /usr/bin/vim.basic /usr/bin/vim \
    && chmod u+s /usr/bin/vim \
    && sed -i "s/80/$PORT/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf \
    && echo "scinet{1_4m_Ur_F47HeR}" >> /home/vader/flag.txt \
    && chown vader:vader /home/vader/flag.txt \
    && chmod 600 /home/vader/flag.txt \
    && echo "scinet{M4y_7h3_f0RC3_83_W17H_Y0U}" >> /root/flag.txt \
    && chown root:root /root/flag.txt \
    && chmod 600 /root/flag.txt

# running as root by default - MLG lvl security, and this is docker stdlib btw
# I mean this is a CTF, but this image barebone would make it laughably easy
USER vader