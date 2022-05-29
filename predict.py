import joblib
import numpy as np
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score


dataset = pd.read_csv("testdata.csv")
filename = 'model.pickle'

predictors = dataset.drop("target", axis=1)
target = dataset["target"]

X_test = predictors

max_accuracy = 0


# load the model from disk
loaded_model = joblib.load(filename)

newPred = loaded_model.predict(X_test)
print(newPred[0])

#mewPredResult = round(accuracy_score(newPred, Y_test)*100, 2)
#print("The accuracy score achieved using RF (Model)): "+str(mewPredResult)+" %")
#
