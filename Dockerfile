FROM kristophjunge/test-saml-idp

ENV SIMPLESAMLPHP_SP_ENTITY_ID "localhost"
ENV SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE "http://localhost:3000/login/saml"

WORKDIR /var/www/simplesamlphp

COPY ./build /build

RUN mv /build/config/authsources.php config/ && \
    mv /build/config/users config/ && \
    mv /build/metadata/saml20-idp-hosted.php metadata/

# Container metadata.
LABEL ca.unb.lib.generator="simplesamlphp" \
  com.microscaling.docker.dockerfile="/Dockerfile" \
  com.microscaling.license="MIT" \
  org.label-schema.build-date=$BUILD_DATE \
  org.label-schema.description="Image for local SAML authentication." \
  org.label-schema.schema-version="1.0" \
  org.label-schema.vcs-ref=$VCS_REF \
  org.label-schema.vcs-url="https://github.com/unb-libraries/docker-local-saml" \
  org.label-schema.vendor="University of New Brunswick Libraries" \
  org.label-schema.version=$VERSION \
  org.opencontainers.image.source="https://github.com/unb-libraries/docker-local-saml"