FROM docker.elastic.co/kibana/kibana-oss:6.7.1

WORKDIR /usr/share/kibana

COPY logtrail.zip .

RUN kibana-plugin install file:///usr/share/kibana/logtrail.zip