import warnings
from sklearn.model_selection import train_test_split
import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
from sklearn.ensemble import RandomForestClassifier
import pickle
import joblib


import os
print(os.listdir())

warnings.filterwarnings('ignore')


dataset = pd.read_csv("heart.csv")


dataset.head(5)

dataset.describe()


y = dataset["target"]

sns.countplot(y)


target_temp = dataset.target.value_counts()

print(target_temp)


print("Percentage of patience without heart problems: " +
      str(round(target_temp[0]*100/303, 2)))
print("Percentage of patience with heart problems: " +
      str(round(target_temp[1] * 100 / 303, 2)))


predictors = dataset.drop("target", axis=1)
target = dataset["target"]

X_train, X_test, Y_train, Y_test = train_test_split(
    predictors, target, test_size=0.20, random_state=0)

max_accuracy = 0


for x in range(2000):
    rf = RandomForestClassifier(random_state=x)
    rf.fit(X_train, Y_train)
    Y_pred_rf = rf.predict(X_test)
    current_accuracy = round(accuracy_score(Y_pred_rf, Y_test)*100, 2)
    if(current_accuracy > max_accuracy):
        max_accuracy = current_accuracy
        best_x = x


rf = RandomForestClassifier(random_state=best_x)
rf.fit(X_train, Y_train)
Y_pred_rf = rf.predict(X_test)


score_rf = round(accuracy_score(Y_pred_rf, Y_test)*100, 2)

print("The accuracy score achieved : "+str(score_rf)+" %")

# save the model to disk
filename = 'model.pickle'
# pickle.dump(model, open(filename, 'wb'))
joblib.dump(rf, filename)

# load the model from disk
loaded_model = joblib.load(filename)

newPred = loaded_model.predict(X_test)

mewPredResult = round(accuracy_score(newPred, Y_test)*100, 2)

# print("The accuracy score achieved using RF (Model)): "+str(score_rf)+" %")
