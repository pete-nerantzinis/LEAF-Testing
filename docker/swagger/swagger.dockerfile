FROM swaggerapi/swagger-ui:v3.45.1

COPY /docker/swagger/nexus-swagger.json /usr/share/nginx/html/apiapi/nexus-swagger.json
COPY /docker/swagger/portal-swagger.json /usr/share/nginx/html/apiapi/portal-swagger.json