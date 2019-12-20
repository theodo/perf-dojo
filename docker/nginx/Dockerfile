FROM nginx:1.17.3-alpine

# Add brotli support
RUN cd ~ && \
  wget https://nginx.org/download/nginx-1.17.3.tar.gz && \
  tar xf nginx-1.17.3.tar.gz && \
  apk add git g++ pcre-dev zlib-dev openssl openssl-dev make && \
  git clone https://github.com/google/ngx_brotli.git && \
  cd ngx_brotli && git submodule update --init && cd ~/nginx-1.17.3 && \
  ./configure --with-compat --add-dynamic-module=../ngx_brotli && \
  make modules && \
  cp objs/*.so /etc/nginx/modules && \
  chmod 644 /etc/nginx/modules/*.so && \
  echo "load_module modules/ngx_http_brotli_filter_module.so;" > /etc/nginx/loadModule && \
  echo "load_module modules/ngx_http_brotli_static_module.so;" >> /etc/nginx/loadModule && \
  cat /etc/nginx/loadModule /etc/nginx/nginx.conf > /etc/nginx/nginx2.conf && \
  mv /etc/nginx/nginx2.conf /etc/nginx/nginx.conf && \
  rm -rf /etc/nginx/loadModule ~/nginx-1.17.3* ~/ngx_brotli && \
  apk del g++ pcre-dev zlib-dev openssl openssl-dev make

COPY docker/nginx/certs /etc/nginx/certs
COPY docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf
COPY public /var/www/public
