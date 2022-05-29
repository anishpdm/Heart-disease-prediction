import joblib
import numpy as np
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score

from flask import Flask
import requests
from flask import request, jsonify
import json

app = Flask("__name__")


@app.route('/api/predictcancer', methods=['GET'])
def predict():
    if request.method == 'GET':
        print("hello")
       # print(request.args['Pincode']+request.args['Temperature']+request.args['Humidity']+request.args['Tide length']+request.args['Richter magnitude']+request.args['Status'])
        #X_test =pd.DataFrame([request.args['Pincode'],request.args['Temperature'],request.args['Humidity'],request.args['Tide length'],request.args['Richter magnitude'],request.args['Status']],columns = ['Pincode','Temperature','Humidity','Richter magnitude','Tide length','Status'])
        test = {'age': [request.args['age']],
                'sex': [request.args['sex']],
                'cp': [request.args['cp']],
                'trestbps': [request.args['trestbps']],
                'chol': [request.args['chol']],
                'fbs': [request.args['fbs']],
                'restecg': [request.args['restecg']],
                'thalach': [request.args['thalach']],
                'exang': [request.args['exang']],
                'oldpeak': [request.args['oldpeak']],
                'slope': [request.args['slope']],
                'ca': [request.args['ca']],
                'thal': [request.args['thal']],
                'target': '0'




                }

        print(test)
        X_test1 = pd.DataFrame(test)
        X_test1.to_csv('testdata1.csv', index=False)

# read in the data and check the first 5 rows
        dataset = pd.read_csv("testdata1.csv")

        filename = 'model.pickle'

        predictors = dataset.drop("target", axis=1)
        target = dataset["target"]

        X_test = predictors

        max_accuracy = 0


# load the model from disk
        loaded_model = joblib.load(filename)

        newPred = loaded_model.predict(X_test)
        print(newPred[0])
        if newPred[0] == 0:
            type = 'false'
        else:
            type = 'true'
    return type


if(__name__) == "__main__":
    app.run(port=4000)
