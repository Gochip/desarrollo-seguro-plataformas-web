FROM python:3.8.5-alpine
COPY . /app
WORKDIR /app
RUN apk add gcc python3-dev libffi-dev
RUN pip install -r requirements.txt

CMD ["python3", "app.py"]