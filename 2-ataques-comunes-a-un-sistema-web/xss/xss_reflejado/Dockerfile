FROM python:3.8

LABEL xss_reflejado=1.0

WORKDIR /app

COPY . /app

RUN pip install -r requirements.txt

CMD ["flask", "run", "--host", "0.0.0.0"]